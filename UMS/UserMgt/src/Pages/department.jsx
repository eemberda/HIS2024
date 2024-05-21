import { Title, SimpleGrid, rem, TextInput, CloseButton } from '@mantine/core'
import {
  Departmentmodal,
  UMSCard,
  DepartmentInfoModal,
} from '../Components/components'
import { departmentsData } from '../../Data/ChartData'
import { RiSearchEyeLine } from 'react-icons/ri'

export default function department() {
  return (
    <>
      <Title order={1} mb={30}>
        Departments
      </Title>

      <TextInput
        mb={'md'}
        placeholder="Search User"
        rightSection={<CloseButton icon={<RiSearchEyeLine />} />}
        w={rem(300)}
      />
      <Departmentmodal />

      <SimpleGrid cols={4} mt={rem(50)}>
        {departmentsData.map((data) => (
          <UMSCard
            ViewCTA={<DepartmentInfoModal />}
            badge_Text={'New'}
            card_title={data.Department_Name}
            key={data.id}
            DeleteCTA={'Delete'}
          />
        ))}
      </SimpleGrid>
    </>
  )
}
