/* eslint-disable react-hooks/exhaustive-deps */
/* eslint-disable react-hooks/rules-of-hooks */
import {
  SimpleGrid,
  Title,
  rem,
  TextInput,
  CloseButton,
  Skeleton,
} from '@mantine/core'
import { UMSCard } from '../Components/components'
import { RiSearchEyeLine } from 'react-icons/ri'
import supabaseDBConnector from '../../config/supabase'
import { useEffect, useState } from 'react'
import { useForm } from '@mantine/form'

export default function usermgt() {
  const [usersData, setUsers] = useState([])
  const [isLoading, setIsLoading] = useState(true)

  const searchBar = useForm({
    initialValues: {
      searchInput: '',
    },
  })

  const getUserData = async () => {
    setIsLoading(true)
    let { data: User, error } = await supabaseDBConnector
      .from('User')
      .select('*')

    if (User) {
      setUsers(User)
    }

    if (error) {
      console.log(error)
    }
    setIsLoading(false)
  }

  const search = async () => {
    setIsLoading(true)
    let { data: User, error } = await supabaseDBConnector
      .from('User')
      .select('*')
      .ilike('user_firstname', `%${searchBar.values.searchInput}%`)

    if (User) {
      setUsers(User)
    }

    if (error) {
      console.log(error)
    }
    setIsLoading(false)
  }

  useEffect(() => {
    const fetchData = async () => {
      if (searchBar.values.searchInput === '') {
        await getUserData()
      } else {
        await search()
      }
    }

    fetchData()
  }, [searchBar.values.searchInput])

  return (
    <>
      <Title order={1} mb={30}>
        Registered Users
      </Title>
      <form
        onSubmit={(e) => {
          e.preventDefault()
          search()
        }}
      >
        <TextInput
          placeholder="Search User"
          rightSection={
            <CloseButton
              icon={<RiSearchEyeLine />}
              onClick={() => searchBar.setFieldValue('searchInput', '')}
            />
          }
          w={rem(300)}
          {...searchBar.getInputProps('searchInput')}
        />
      </form>
      <SimpleGrid cols={4} mt={rem(50)}>
        {isLoading ? (
          <>
            <Skeleton height={300} />
            <Skeleton height={300} />
            <Skeleton height={300} />
            <Skeleton height={300} />
          </>
        ) : (
          usersData.map((data) => (
            <UMSCard
              key={data.user_id}
              card_title={data.user_firstname}
              DeleteCTA="Delete User"
              ViewCTA="View User"
            />
          ))
        )}
      </SimpleGrid>
    </>
  )
}
