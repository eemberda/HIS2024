import { NavLink } from '@mantine/core'

export default function navlink({ to, Label, Icon }) {
  return (
    <>
      <NavLink  href={to} label={Label} leftSection={Icon} />
    </>
  )
}
