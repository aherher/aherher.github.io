// draw front faces
gl.enable(gl.CULL_FACE);
gl.cullFace(gl.BACK);

// draw back faces
gl.enable(gl.CULL_FACE);
gl.cullFace(gl.FRONT);


const float PI2 = 6.28318530718;

vec4 radialRainbow(vec2 st, float tick) {
  vec2 toCenter = vec2(0.5) - st;
  float angle = mod((atan(toCenter.y, toCenter.x) / PI2) + 0.5 + sin(tick), 1.0);

  // colors
  vec4 a = vec4(0.15, 0.58, 0.96, 1.0);
  vec4 b = vec4(0.29, 1.00, 0.55, 1.0);
  vec4 c = vec4(1.00, 0.0, 0.85, 1.0);
  vec4 d = vec4(0.92, 0.20, 0.14, 1.0);
  vec4 e = vec4(1.00, 0.96, 0.32, 1.0);

  float step = 1.0 / 10.0;

  vec4 color = a;

  color = mix(color, b, smoothstep(step * 1.0, step * 2.0, angle));
  color = mix(color, a, smoothstep(step * 2.0, step * 3.0, angle));
  color = mix(color, b, smoothstep(step * 3.0, step * 4.0, angle));
  color = mix(color, c, smoothstep(step * 4.0, step * 5.0, angle));
  color = mix(color, d, smoothstep(step * 5.0, step * 6.0, angle));
  color = mix(color, c, smoothstep(step * 6.0, step * 7.0, angle));
  color = mix(color, d, smoothstep(step * 7.0, step * 8.0, angle));
  color = mix(color, e, smoothstep(step * 8.0, step * 9.0, angle));
  color = mix(color, a, smoothstep(step * 9.0, step * 10.0, angle));

  return color;
}

#pragma glslify: export (radialRainbow);

/**
 * gl_FragCoord: pixel coordinates
 * u_resolution: the resolution of our canvas
 */
vec2 st = gl_FragCoord.xy / u_resolution;

float borders(vec2 uv, float strokeWidth) {
  vec2 borderBottomLeft = smoothstep(vec2(0.0), vec2(strokeWidth), uv);

  vec2 borderTopRight = smoothstep(vec2(0.0), vec2(strokeWidth), 1.0 - uv);

  return 1.0 - borderBottomLeft.x * borderBottomLeft.y * borderTopRight.x * borderTopRight.y;
}

#pragma glslify: export (borders);

precision mediump float;

uniform vec2 u_resolution;
uniform float u_tick;

varying vec2 v_uv;
varying float v_depth;

#pragma glslify: borders = require(borders.glsl);
#pragma glslify: radialRainbow = require(radial - rainbow.glsl);

void main() {
  // screen coordinates
  vec2 st = gl_FragCoord.xy / u_resolution;

  vec4 bordersColor = radialRainbow(st, u_tick);

  // opacity factor based on the z value
  float depth = clamp(smoothstep(-1.0, 1.0, v_depth), 0.6, 0.9);

  bordersColor *= vec4(borders(v_uv, 0.011)) * depth;

  gl_FragColor = bordersColor;
}

// here we'll put the logo and the texts
const textures = [
  ...
]

// we create the FBO
const contentFbo = regl.framebuffer()

// animate is executed at render time
const animate = ({ viewportWidth, viewportHeight }) => {
  contentFbo.resize(viewportWidth, viewportHeight)

  // we tell WebGL to render off-screen, inside the FBO
  contentFbo.use(() => {
    /**
     * – Content program
     * It'll run as many times as the textures number
     */
    content({
      textures
    })
  })

  /**
   * – Cube program
   * It'll run twice, once for the back faces and once for front faces
   * Together with front faces we'll render the content as well
   */
  cube([
    {
      pass: 1,
      cullFace: 'FRONT',
    },
    {
      pass: 2,
      cullFace: 'BACK',
      texture: contentFbo, // we pass the FBO as a normal texture
    },
  ])
}

regl.frame(animate)

precision mediump float;

uniform vec2 u_resolution;
uniform float u_tick;
uniform int u_pass;
uniform sampler2D u_texture;

varying vec2 v_uv;
varying float v_depth;

#pragma glslify: borders = require(borders.glsl);
#pragma glslify: radialRainbow = require(radial - rainbow.glsl);

void main() {
  // screen coordinates
  vec2 st = gl_FragCoord.xy / u_resolution;

  vec4 texture;
  vec4 bordersColor = radialRainbow(st, u_tick);

  // opacity factor based on the z value
  float depth = clamp(smoothstep(-1.0, 1.0, v_depth), 0.6, 0.9);

  bordersColor *= vec4(borders(v_uv, 0.011)) * depth;

  if (u_pass == 2) {
    texture = texture2D(u_texture, st);
  }

  gl_FragColor = texture + bordersColor;
}

const textures = [
  {
    texture: logoTexture,
    maskId: 1,
  },
  {
    texture: logoTexture,
    maskId: 2,
  },
  {
    texture: logoTexture,
    maskId: 3,
  },
  {
    texture: text1Texture,
    maskId: 4,
  },
  {
    texture: text2Texture,
    maskId: 5,
  },
]

MaskID 1 => [0, 0, 1] => Blue
MaskID 2 => [0, 1, 0] => Lime
MaskID 3 => [0, 1, 1] => Cyan
MaskID 4 => [1, 0, 0] => Red
MaskID 5 => [1, 0, 1] => Magenta

maskFbo.use(() => {
  cubeMask([
    {
      cullFace: 'BACK',
      colorFaces: [
        [0, 1, 1], // front face => mask 3
        [0, 0, 1], // right face => mask 1
        [0, 1, 0], // back face => mask 2
        [0, 1, 1], // left face => mask 3
        [1, 0, 0], // top face => mask 4
        [1, 0, 1], // bottom face => mask 5
      ]
    },
  ])
});

contentFbo.use(() => {
  content({
    textures,
    mask: maskFbo
  })
})

precision mediump float;

uniform vec2 u_resolution;
uniform sampler2D u_texture;
uniform int u_maskId;
uniform sampler2D u_mask;

varying vec2 v_uv;

void main() {
  vec2 st = gl_FragCoord.xy / u_resolution;

  vec4 texture = texture2D(u_texture, v_uv);

  vec4 mask = texture2D(u_mask, st);

  // convert the mask color from binary (rgb) to decimal
  int maskId = int(mask.r * 4.0 + mask.g * 2.0 + mask.b * 1.0);

  // if the test passes then draw the texture
  if (maskId == u_maskId) {
    gl_FragColor = texture;
  } else {
    discard;
  }
}

displacementFbo.use(() => {
  cubeDisplacement([
    {
      cullFace: 'BACK'
    },
  ])
});

contentFbo.use(() => {
  content({
    textures,
    mask: maskFbo,
    displacement: displacementFbo
  })
})

precision mediump float;

varying vec2 v_uv;

#pragma glslify: borders = require(borders.glsl);

void main() {
  // Green channel – how much to move the pixel
  float length = borders(v_uv, 0.028) + borders(v_uv, 0.06) * 0.3;

  gl_FragColor = vec4(0.0, length, 0.0, 1.0);
}

precision mediump float;

attribute vec3 a_position;
attribute vec3 a_center;
attribute vec2 a_uv;

uniform mat4 u_projection;
uniform mat4 u_view;
uniform mat4 u_world;

varying vec3 v_center;
varying vec3 v_point;
varying vec2 v_uv;

void main() {
  vec4 position = u_projection * u_view * u_world * vec4(a_position, 1.0);
  vec4 center = u_projection * u_view * u_world * vec4(a_center, 1.0);

  v_point = position.xyz;
  v_center = center.xyz;
  v_uv = a_uv;

  gl_Position = position;
}

precision mediump float;

varying vec3 v_center;
varying vec3 v_point;
varying vec2 v_uv;

const float PI2 = 6.283185307179586;

#pragma glslify: borders = require(borders.glsl);

void main() {
  // Red channel – which direction to move the pixel
  vec2 toCenter = v_center.xy - v_point.xy;
  float direction = (atan(toCenter.y, toCenter.x) / PI2) + 0.5;

  // Green channel – how much to move the pixel
  float length = borders(v_uv, 0.028) + borders(v_uv, 0.06) * 0.3;

  gl_FragColor = vec4(direction, length, 0.0, 1.0);
}

precision mediump float;

uniform vec2 u_resolution;
uniform sampler2D u_texture;
uniform int u_maskId;
uniform sampler2D u_mask;

varying vec2 v_uv;

void main() {
  vec2 st = gl_FragCoord.xy / u_resolution;

  vec4 displacement = texture2D(u_displacement, st);
  // get the direction by taking the displacement red channel and convert it in a vector2
  vec2 direction = vec2(cos(displacement.r * PI2), sin(displacement.r * PI2));
  // get the length by taking the displacement green channel
  float length = displacement.g;

  vec2 newUv = v_uv;

  // calculate the new uvs
  newUv.x += (length * 0.07) * direction.x;
  newUv.y += (length * 0.07) * direction.y;

  vec4 texture = texture2D(u_texture, newUv);

  vec4 mask = texture2D(u_mask, st);

  // convert the mask color from binary (rgb) to decimal
  int maskId = int(mask.r * 4.0 + mask.g * 2.0 + mask.b * 1.0);

  // if the test passes then draw the texture
  if (maskId == u_maskId) {
    gl_FragColor = texture;
  } else {
    discard;
  }
}


// this is a normal FBO
const contentFbo = regl.framebuffer()

// this is a cube FBO, that means it composed by 6 textures
const reflectionFbo = regl.framebufferCube(1024)

// animate is executed at render time
const animate = ({ viewportWidth, viewportHeight }) => {
  contentFbo.resize(viewportWidth, viewportHeight)

  contentFbo.use(() => {
    ...
  })

  /**
   * – Reflection program
   * we'll iterate 6 times over the reflectionFbo and draw inside the
   * result of each camera
   */
  reflection({
    reflectionFbo,
    cameraConfig,
    texture: contentFbo
  })

/**
 * – Cube program
 * with the back faces we'll render the reflection as well
 */
cube([
  {
    pass: 1,
    cullFace: 'FRONT',
    reflection: reflectionFbo,
  },
  {
    pass: 2,
    cullFace: 'BACK',
    texture: contentFbo,
  },
])
}

regl.frame(animate)

precision mediump float;

uniform vec2 u_resolution;
uniform float u_tick;
uniform int u_pass;
uniform sampler2D u_texture;
uniform samplerCube u_reflection;

varying vec2 v_uv;
varying float v_depth;
varying vec3 v_normal;

#pragma glslify: borders = require(borders.glsl);
#pragma glslify: radialRainbow = require(radial - rainbow.glsl);

void main() {
  // screen coordinates
  vec2 st = gl_FragCoord.xy / u_resolution;

  vec4 texture;
  vec4 bordersColor = radialRainbow(st, u_tick);

  // opacity factor based on the z value
  float depth = clamp(smoothstep(-1.0, 1.0, v_depth), 0.6, 0.9);

  bordersColor *= vec4(borders(v_uv, 0.011)) * depth;

  // if u_pass is 1, we're drawing back faces
  if (u_pass == 1) {
    vec3 normal = normalize(v_normal);
    texture = textureCube(u_reflection, normal);
  }

  // if u_pass is 1, we're drawing back faces
  if (u_pass == 2) {
    texture = texture2D(u_texture, st);
  }

  gl_FragColor = texture + bordersColor;
}