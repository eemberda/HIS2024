import { Table } from '@mantine/core'
import { DailyTimeRow } from './components'

export function TableReport() {
  return (
    <>
      <Table mt={'lg'} span={6}>
        <Table.Thead>
          <Table.Tr>
            <Table.Th>Element position</Table.Th>
            <Table.Th>Element name</Table.Th>
            <Table.Th>Symbol</Table.Th>
            <Table.Th>Atomic mass</Table.Th>
          </Table.Tr>
        </Table.Thead>
        <Table.Tbody>
          <DailyTimeRow />
        </Table.Tbody>
      </Table>
    </>
  )
}
