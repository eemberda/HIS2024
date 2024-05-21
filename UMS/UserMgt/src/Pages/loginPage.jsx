/* eslint-disable no-unused-vars */
import { LoginForm } from '../Components/components'
import { Paper, rem, Center } from '@mantine/core'

export default function loginPage() {
  return (
    <>
      <Center h={500}>
        <Paper shadow="xl" radius="xl" p="xl" w={rem(400)}>
          <LoginForm />
        </Paper>
      </Center>
    </>
  )
}
