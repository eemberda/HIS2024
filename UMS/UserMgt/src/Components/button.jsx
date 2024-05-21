import { Button } from '@mantine/core'

export default function button({ variant, color, size, label, type }) {
  return (
    <>
      <Button variant={variant} color={color} size={size} type={type}>
        {label}
      </Button>
    </>
  )
}
