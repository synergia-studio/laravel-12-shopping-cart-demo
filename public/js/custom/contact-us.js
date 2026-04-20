import { reactive } from 'vue'

const form = reactive({
  name: '',
  email: ''
})

const errors = reactive({
  name: '',
  email: ''
})

function submitForm() {
  // reset errors
  errors.name = ''
  errors.email = ''

  // validation
  if (!form.name.trim()) {
    errors.name = 'Name is required'
  }

  if (!form.email.includes('@')) {
    errors.email = 'Valid email required'
  }

  // stop if errors
  if (errors.name || errors.email) {
    return
  }

  alert('Form is valid ✅')
}
