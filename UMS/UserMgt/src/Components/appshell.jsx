/* eslint-disable react/prop-types */
import {
  AppShell,
  Burger,
  Group,
  Flex,
  ActionIcon,
  useMantineColorScheme,
  Image,
  Text,
  rem,
} from '@mantine/core'
import { useDisclosure } from '@mantine/hooks'

import { NavLink } from './components'

import { RiDashboardHorizontalLine } from 'react-icons/ri'
import { LuUsers } from 'react-icons/lu'
import { TbUsersGroup, TbReportSearch } from 'react-icons/tb'
import { BsMoon, BsSun } from 'react-icons/bs'
import { RiBuilding2Line } from 'react-icons/ri'
import Logo from '../assets/UMSLOGO.png' // Adjust the path accordingly
export default function Appshell({ TheContent }) {
  const [mobileOpened, { toggle: toggleMobile }] = useDisclosure()
  const [desktopOpened, { toggle: toggleDesktop }] = useDisclosure(true)
  const { colorScheme, toggleColorScheme } = useMantineColorScheme()
  const dark = colorScheme === 'dark'
  return (
    <>
      <AppShell
        header={{ height: 80 }}
        navbar={{
          width: 300,
          breakpoint: 'sm',
          collapsed: { mobile: !mobileOpened, desktop: !desktopOpened },
        }}
        p="md"
      >
        <AppShell.Header>
          <Flex
            direction="row"
            align="center"
            justify="space-between"
            
            mr={25}
          >
            <Group p={10}>
              <Burger
                opened={mobileOpened}
                onClick={toggleMobile}
                hiddenFrom="sm"
                size="sm"
              />
              <Burger
                opened={desktopOpened}
                onClick={toggleDesktop}
                visibleFrom="sm"
                size="sm"
              />
              <Group>
                <Image src={Logo} w={rem(60)} />
                <Text
                  fw="bolder"
                  gradient={
                    dark
                      ? { from: 'red', to: 'cyan' }
                      : { from: 'red', to: 'cyan' }
                  }
                >
                  ManAge: User Management System
                </Text>
              </Group>
            </Group>
            <ActionIcon
              variant="outline"
              color={dark ? 'yellow' : 'Black'}
              onClick={() => toggleColorScheme()}
              title="Toggle color scheme"
            >
              {dark ? (
                <BsSun size={18} color="yellow" />
              ) : (
                <BsMoon size={18} color="Black" />
              )}
            </ActionIcon>
          </Flex>
        </AppShell.Header>

        <AppShell.Navbar p="md">
          <NavLink
            to="/in"
            Label={'Dashboard'}
            Icon={<RiDashboardHorizontalLine size="1.5rem" />}
          />
          <NavLink
            to="/in/UserMgt"
            Label={'User Management'}
            Icon={<LuUsers size="1.5rem" />}
          />
          <NavLink
            to="/in/Positions"
            Label={'Positions'}
            Icon={<TbUsersGroup size="1.5rem" />}
          />
          <NavLink
            to="/in/Departments"
            Label={'Departments'}
            Icon={<RiBuilding2Line size="1.5rem" />}
          />
          <NavLink
            to="/in/Reports"
            Label={'Reports'}
            Icon={<TbReportSearch size="1.5rem" />}
          />
        </AppShell.Navbar>

        <AppShell.Main>{TheContent}</AppShell.Main>
      </AppShell>
    </>
  )
}
