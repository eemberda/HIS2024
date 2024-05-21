/* eslint-disable react-refresh/only-export-components */
/* eslint-disable react-hooks/rules-of-hooks */
import { UMSButton } from '../Components/components'
import { Group, TextInput, PasswordInput } from '@mantine/core'
import { useForm } from '@mantine/form'

export function loginForm() {
  const loginform = useForm({
    initialValues: {
      id: '',
      password: '',
    },
  })

  const handleSubmit = (event) => {
    event.preventDefault()
    console.log(loginform.getValues().id)
    console.log(loginform.getValues().password)
  }
  return (
    <>
      <form onSubmit={handleSubmit}>
        <TextInput
          withAsterisk
          label={'Adminstrator ID'}
          placeholder={'Enter Administrator ID'}
          {...loginform.getInputProps('id')}
        />
        <PasswordInput
          withasterisk="true"
          label={'Administrator Password'}
          placeholder={'Enter Administrator Password'}
          {...loginform.getInputProps('password')}
        />

        <Group justify="flex-end" mt="md">
          <UMSButton label={'Save'} type="submit" variant={'filled'} />
        </Group>
      </form>
    </>
  )
}

export function AddDepartmentForm() {
  return (
    <>
      <form>
        <TextInput
          withAsterisk
          label={'Department Number'}
          placeholder={'Enter the Department Number'}
        />

        <TextInput
          withAsterisk
          label={'Department name'}
          placeholder={'Enter the Department Name'}
        />

        <TextInput
          withAsterisk
          label={'Role Description'}
          placeholder={'Enter a description of the Department'}
        />

        <Group justify="flex-end" mt="md">
          <UMSButton label={'Save'} type={'submit'} variant={'filled'} />
        </Group>
      </form>
    </>
  )
}

export function AddPositionForm() {
  return (
    <>
      <form>
        <TextInput
          withAsterisk
          label={'Role name'}
          placeholder={'Enter the name of Role'}
        />
        <PasswordInput
          withasterisk
          label={'Role Description'}
          placeholder={'Enter a description of Role'}
        />

        <Group justify="flex-end" mt="md">
          <UMSButton label={'Save'} type="submit" variant={'filled'} />
        </Group>
      </form>
    </>
  )
}
