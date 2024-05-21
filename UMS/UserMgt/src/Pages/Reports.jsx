import { Tabs, rem } from '@mantine/core'
// import { GrDocumentTime } from 'react-icons/gr'
import { HiOutlineDocumentReport } from 'react-icons/hi'
import { TbReport } from 'react-icons/tb'
import {
  DailyTimeReportsContent,
  TransactionsReportsContent,
} from '../Components/components'
export default function Reports() {
  const iconStyle = { width: rem(12), height: rem(12) }
  return (
    <>
      <Tabs defaultValue="dtr" variant="pills" >
        <Tabs.List mb={'lg'}>
          <Tabs.Tab
            value="dtr"
            leftSection={<TbReport style={iconStyle} />}
            color="orange"
          >
            Daily Time Record
          </Tabs.Tab>
          <Tabs.Tab
            value="transactions"
            leftSection={<HiOutlineDocumentReport style={iconStyle} />}
            color="blue"
          >
            Transaction Reports
          </Tabs.Tab>
        </Tabs.List>

        <Tabs.Panel value="dtr">
          <DailyTimeReportsContent />
        </Tabs.Panel>

        <Tabs.Panel value="transactions">
          <TransactionsReportsContent />
        </Tabs.Panel>
      </Tabs>
    </>
  )
}
