import { UMSAppshell } from '../Components/components'
import { Outlet } from 'react-router-dom'
export default function homepage() {
  return (
    <>
      <UMSAppshell TheContent={<Outlet />} />
    </>
  )
}
