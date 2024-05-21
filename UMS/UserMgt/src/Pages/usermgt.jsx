import { SimpleGrid, Title, rem, TextInput, CloseButton } from '@mantine/core'
import { users } from '../../Data/ChartData'
import { UMSCard, UserInfoModal } from '../Components/components'
import { RiSearchEyeLine } from 'react-icons/ri'
export default function usermgt() {
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
        {users.map((data) => (
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
        ))}
      </SimpleGrid>
    </>
  )
}
