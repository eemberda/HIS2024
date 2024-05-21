import { SimpleGrid, Title, rem, TextInput, CloseButton } from '@mantine/core'
import {
  Positionmodal,
  UMSCard,
  PositionInfoModal,
} from '../Components/components'
import { position } from '../../Data/ChartData'
import { RiSearchEyeLine } from 'react-icons/ri'

export default function Positions() {
  return (
    <>
      <Title order={1} mb={30}>
        Positions
      </Title>

      <TextInput
        mb={'md'}
        placeholder="Search User"
        rightSection={<CloseButton icon={<RiSearchEyeLine />} />}
        w={rem(300)}
      />
      <Positionmodal />

      <SimpleGrid cols={4} mt={rem(50)}>
        {position.map((data) => (
          <UMSCard
            DeleteCTA={'Delete Position'}
            ViewCTA={<PositionInfoModal />}
            card_title={data.Positions_Name}
            badge_Text={data.Users}
            key={data.id}
          />
        ))}
      </SimpleGrid>
    </>
  )
}
