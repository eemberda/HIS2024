import { LineChart } from '@mantine/charts'
import { Chartdata } from '../../../Data/ChartData'
export default function Line_Chart() {
  return (
    <>
      <LineChart
        h={300}
        data={Chartdata}
        dataKey="date"
        series={[
          { name: 'Apples', color: 'indigo.6' },
          { name: 'Oranges', color: 'blue.6' },
          { name: 'Tomatoes', color: 'teal.6' },
        ]}
        curveType="linear"
      />
    </>
  )
}
