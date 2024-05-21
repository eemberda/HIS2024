/* eslint-disable react-hooks/rules-of-hooks */
import { SimpleGrid, Title, rem, TextInput, CloseButton } from '@mantine/core'
// import { users } from '../../Data/ChartData'
import { UMSCard, UserInfoModal } from '../Components/components'
import { RiSearchEyeLine } from 'react-icons/ri'
import supabaseDBConnector from '../../config/supabase'
import { useEffect, useState } from 'react'

export default function usermgt() {
  const [usersData, setUsers] = useState([])

  const getUserData = async () => {
    let { data: User, error } = await supabaseDBConnector
      .from('User')
      .select('*')

    if (User) {
      setUsers(User)
    }

    if (error) {
      console.log(error)
    }
  }

  useEffect(() => {
    getUserData()
  })

  return (
    <>
      <Title order={1} mb={30}>
        Registered Users
      </Title>
      <TextInput
        placeholder="Search User"
        rightSection={<CloseButton icon={<RiSearchEyeLine />} />}
        w={rem(300)}
      />
      <SimpleGrid cols={4} mt={rem(50)}>
        {usersData.map((my_user, num) => (
          <UMSCard
            key={num}
            card_title={my_user.user_firstname}
            DeleteCTA={'Delete User'}
            ViewCTA={'View User'}
          />
        ))}

        {/* {users.map((data) => (
          <UMSCard
            key={data.id}
            card_title={data.first_name + ` ` + data.last_name}
            badge_Text={data.position}
            description={`
              Email: ${data.email}
              Assign Department: ${data.department}
            `}
            DeleteCTA={'Block user'}
            ViewCTA={<UserInfoModal />}
          />
        ))} */}
      </SimpleGrid>
    </>
  )
}
