import { PieChart } from '@mantine/charts'
import { chartdata2 } from '../../../Data/ChartData'
export default function Pie_Chart() {
  return (
    <>
      <PieChart data={chartdata2} withTooltip tooltipDataSource="segment" />
    </>
  )
}
