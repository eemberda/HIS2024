import '@mantine/core/styles.css'

import { Routes, Route } from 'react-router-dom'
import {
  LoginPage,
  HomePage,
  Dashboard,
  Departments,
  Positions,
  Reports,
  UserMgt,
} from './Pages/pages'

export default function App() {





  return (
    <>
      <Routes>
        <Route path="/" element={<LoginPage />} />

        <Route path="/in" element={<HomePage />}>
          <Route index="true" element={<Dashboard />} />
          <Route path="/in/Positions" element={<Positions />} />
          <Route path="/in/Departments" element={<Departments />} />
          <Route path="/in/UserMgt" element={<UserMgt />} />
          <Route path="/in/Reports" element={<Reports />} />
        </Route>
      </Routes>
    </>
  )
}
