import { Card, Image, Text, Badge, Button, Group } from '@mantine/core'
export default function card({
  img,
  card_title,
  badge_Text,
  description1,
  description2,
  ViewCTA,
  DeleteCTA,
}) {
  return (
    <>
      <Card shadow="sm" padding="lg" radius="md" withBorder>
        <Card.Section>
          <Image src={img} height={160} />
        </Card.Section>

        <Group justify="space-between" mt="md" mb="xs">
          <Text fw={500}>{card_title}</Text>
          <Badge color="pink">{badge_Text}</Badge>
        </Group>

        <Text size="sm" c="dimmed">
          {description1}
        </Text>

        <Text size="sm" c="dimmed">
          {description2}
        </Text>

        {ViewCTA}

        <Button color="red" fullWidth mt="md" radius="md">
          {DeleteCTA}
        </Button>
      </Card>
    </>
  )
}
