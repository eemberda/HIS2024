import { Divider, Flex, Group, Stack, Text, rem } from '@mantine/core'
import { RiBuilding2Line, RiUser3Line } from 'react-icons/ri'
import { LuUsers } from 'react-icons/lu'

export function Userinfo() {
  return (
    <>
      {' '}
      <Group gap={'sm'} align="center" justify="start">
        <RiUser3Line size={60} color="gray" />
        <Flex
          mih={50}
          gap={rem(0)}
          justify="flex-start"
          align="flex-start"
          direction="column"
        >
          <Text fz="xs" tt="uppercase" fw={700} c="dimmed">
            Software engineer
          </Text>

          <Text fz="lg" fw={500}>
            Robert Glassbreaker
          </Text>

          <Group wrap="nowrap" gap={10} mt={3}>
            <Text fz="xs" c="dimmed">
              robert@glassbreaker.io
            </Text>
          </Group>

          <Group wrap="nowrap" gap={10} mt={5}>
            <Text fz="xs" c="dimmed">
              +11 (876) 890 56 23
            </Text>
          </Group>
        </Flex>
      </Group>
      <Divider my="md" />
    </>
  )
}

export function Positioninfo() {
  return (
    <>
      {' '}
      <Group gap={'sm'} align="center" justify="start">
        <LuUsers size={70} color="gray" />
        <Flex
          gap={rem(0)}
          justify="flex-start"
          align="flex-start"
          direction="column"
        >
          <Text fz="lg" tt="uppercase" fw={700}>
            Software engineer
          </Text>

          <Group wrap="nowrap" gap={10}>
            <Text fz="xs" c="dimmed">
              +11 (876) 890 56 23
            </Text>
          </Group>
        </Flex>
      </Group>
      <Divider my="md" />
    </>
  )
}

export function Departmentinfo() {
  return (
    <>
      {' '}
      <Group gap={'sm'} align="center" justify="start">
        <RiBuilding2Line size={70} color="gray" />
        <Flex
          gap="xs"
          justify="flex-start"
          align="flex-start"
          direction="column"
        >
          <Text fz="lg" tt="uppercase" fw={700}>
            Billine Department
          </Text>

          <Stack wrap="nowrap" gap={'xs'} mt={0}>
            <Text fz="xs" c="dimmed">
              Billing.Dept@Hospital.io
            </Text>
            <Text fz="xs" c="dimmed">
              +63 (095) 798 363 23
            </Text>
          </Stack>
        </Flex>
      </Group>
      <Divider my="md" />
    </>
  )
}
