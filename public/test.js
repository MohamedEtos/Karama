function buildStepsBreadcrumb (wizard, element, steps) {
    const $steps = document.getElementById(element)
    $steps.innerHTML = ''
    for (let label in steps) {
      if (steps.hasOwnProperty(label)) {
        const $li = document.createElement('li')
        const $a = document.createElement('a')
        $li.classList.add('step-item')
        if (steps[label].active) {
          $li.classList.add('active')
        }
        $a.setAttribute('href', '#')
        $a.classList.add('tooltip')
        $a.dataset.tooltip = label
        $a.innerText = label
        $a.addEventListener('click', e => {
          e.preventDefault()
          wizard.revealStep(label)
        })
        $li.appendChild($a)
        $steps.appendChild($li)
      }
    }
  }

  function onStepChange(wizard, selector) {
      const steps = wizard.getBreadcrumb()
      buildStepsBreadcrumb(wizard, selector, steps)
  }

  function customValidation (step, fields, form) {
      Array.from(document.querySelectorAll('.has-error')).forEach(el => {
        el.classList.remove('has-error')
        let message = el.querySelector('.form-input-hint')
        message.classList.remove('is-visible')
        message.innerText = ''
      })
      debugger
      if (step.labeled('security')) {
        if (!form.password.value.length || !form.password_confirm.value.length || form.password.value !== form.password_confirm.value) {
          form.password.parentNode.classList.add('has-error')
          form.password_confirm.parentNode.classList.add('has-error')
          let message = form.password_confirm.parentNode.querySelector('.form-input-hint')
          message.innerText = "Passwords must be the very same !"
          message.classList.add('is-visible')
          return false
        }
      } else if (step.labeled('personal')) {
        debugger
      }
      return true
    }

  const native_wizard = new window.Zangdar('#wizard-native', {
    onStepChange: () => {
      onStepChange(native_wizard, 'steps-native')
    },
    onSubmit(e) {
      e.preventDefault()
      console.log(e.target.elements)
      return false
    }
  })

  onStepChange(native_wizard, 'steps-native')

  const custom_wizard = new window.Zangdar('#wizard-custom', {
    onStepChange: () => {
      onStepChange(custom_wizard, 'steps-custom')
    },
    customValidation,
    onSubmit(e) {
      e.preventDefault()
      console.log(e.target.elements)
      return false
    }
  })

  onStepChange(custom_wizard, 'steps-custom')
