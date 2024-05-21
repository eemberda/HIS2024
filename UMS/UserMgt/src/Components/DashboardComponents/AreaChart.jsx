/* eslint-disable react/prop-types */
import { Chartdata } from '../../../Data/ChartData'
import { AreaChart } from '@mantine/charts'

export default function Area_Chart() {
  return (
    <>
      <AreaChart
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
