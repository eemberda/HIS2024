import { Title, Stack, Grid } from '@mantine/core'
import { Pie_Chart, TableReport } from './components'
export function DailyTimeReportsContent() {
  return (
    <>
      <Title order={1} c={'green'}>
        Daily Time Report: Month of May
      </Title>
      <Grid justify="center" align="flex-start">
        <Grid.Col span={8}>
          <TableReport />
        </Grid.Col>
        <Grid.Col span={4}>
          <Stack justify="center" align="center" span={6}>
            <Title order={2} c={'green'}>
              Graph #1
            </Title>
            <Pie_Chart />
            <Title order={2} c={'green'}>
              Graph #2
            </Title>
            <Pie_Chart />
          </Stack>
        </Grid.Col>
      </Grid>
    </>
  )
}

export function TransactionsReportsContent() {
  return <div>Transaction</div>
}
