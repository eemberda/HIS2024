/* eslint-disable react-refresh/only-export-components */
/* eslint-disable react-hooks/rules-of-hooks */
import { UMSButton } from '../Components/components'
import { Group, TextInput, PasswordInput } from '@mantine/core'
import { useForm } from '@mantine/form'
import { useNavigate } from 'react-router-dom'
import { notifications } from '@mantine/notifications'

export function LoginForm() {
  const navigate = useNavigate()
  const loginform = useForm({
    initialValues: {
      id: '',
      password: '',
    },
  })

  const handleSubmit = (event) => {
    event.preventDefault()

    if (
      loginform.getValues().id == '05222024' &&
      loginform.getValues().password == 'admin2024'
    ) {
      navigate('/in')
      {
        notifications.show({
          title: 'Login Successfully',
          message: 'Good Day Fritz, have a great day ahead',
          autoClose: 1000,
          withCloseButton: false,
        })
      }
    } else if (
      loginform.getValues().id == '05222024' &&
      loginform.getValues().password != 'admin2024'
    ) {
      {
        notifications.show({
          title: 'Inccorect Password',
          message: 'Please enter the correct Password',
          autoClose: 1000,
          withCloseButton: false,
          color: 'red',
        })
      }
    } else if (
      loginform.getValues().id != '05222024' &&
      loginform.getValues().password == 'admin2024'
    ) {
      {
        notifications.show({
          title: 'Inccorect ID',
          message: 'Please enter the correct ID',
          autoClose: 1000,
          withCloseButton: false,
          color: 'red',
        })
      }
    } else {
      {
        notifications.show({
          title: 'Inccorect Credenntials',
          message: 'Please enter the correct credenntials',
          autoClose: 1000,
          withCloseButton: false,
          color: 'red',
        })
      }
    }
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
