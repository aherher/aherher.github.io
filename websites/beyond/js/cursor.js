const trackMousemove = () => {
  const root = document.documentElement

  root.addEventListener("mousemove", (e) => {
    root.style.setProperty('--mouse-x', e.clientX + "px")
    root.style.setProperty('--mouse-y', e.clientY + "px")
  })
}

const trackIntersectSection = () => {
  const root = document.documentElement
  const sections = [...document.querySelectorAll(".section")]

  sections.forEach(section => {
    section.addEventListener("mouseenter", () => {
      root.style.setProperty('--scale-cursor', 2)
    })

    section.addEventListener("mouseleave", () => {
      root.style.setProperty('--scale-cursor', 1)
    })
  })
}

trackMousemove()
trackIntersectSection()