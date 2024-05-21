import { Button } from '@mantine/core'
import { modals } from '@mantine/modals'
import {
  AddDepartmentForm,
  AddPositionForm,
  Userinfo,
  Positioninfo,
  Departmentinfo,
} from './components'
export function Departmentmodal() {
  return (
    <>
      <Button
        onClick={() => {
          modals.open({
            mx: 'auto',
            my: 'auto',
            p: 5,
            title: 'Add a Department',
            children: <AddDepartmentForm />,
          })
        }}
      >
        Add New Department
      </Button>
    </>
  )
}

export function Positionmodal() {
  return (
    <>
      <Button
        onClick={() => {
          modals.open({
            mx: 'auto',
            my: 'auto',
            p: 5,
            title: 'Add Position',
            children: <AddPositionForm />,
          })
        }}
      >
        Add New Position
      </Button>
    </>
  )
}

export function UserInfoModal() {
  return (
    <>
      <Button
        onClick={() => {
          modals.open({
            mx: 'auto',
            my: 'auto',
            p: 5,
            title: 'User #:',
            children: <Userinfo />,
          })
        }}
      >
        View User
      </Button>
    </>
  )
}

export function DepartmentInfoModal() {
  return (
    <>
      <Button
        onClick={() => {
          modals.open({
            mx: 'auto',
            my: 'auto',
            p: 5,
            title: 'Department:',
            children: <Departmentinfo />,
          })
        }}
      >
        View Department
      </Button>
    </>
  )
}

export function PositionInfoModal() {
  return (
    <>
      <Button
        onClick={() => {
          modals.open({
            mx: 'auto',
            my: 'auto',
            p: 5,
            title: 'Position:',
            children: <Positioninfo />,
          })
        }}
      >
        View Position
      </Button>
    </>
  )
}
