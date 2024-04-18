<?php

final class SecretSanta
{
    public function __construct(private array $participants)
    {
    }

    public function generatePairs(): array
    {
        shuffle($this->participants);
        $pairs = [];
        $count = count($this->participants);

        for ($i = 0; $i < $count; $i++) {
            $giver = $this->participants[$i];
            $receiver = ($i == $count - 1) ? $this->participants[0] : $this->participants[$i + 1];

            $pairs[] = [$giver, $receiver];
        }

        return $pairs;
    }

    public function sendNotifications(): void
    {
        $pairs = $this->generatePairs();

        foreach ($pairs as $pair) {
            [$giver, $receiver] = $pair;
            $this->notifyUser($giver, $receiver);
        }
    }

    private function notifyUser(string $giver, string $receiver): void
    {
        // Здесь должен быть код для отправки сообщения пользователю
        // В данном случае, это будет заглушка
        // mail($receiver, 'Сообщение', 'Вы выбраны тайным сантой для ' . $giver);
        echo "Сообщение отправлено получателю $giver: Вы выбраны тайным сантой для $receiver" . PHP_EOL . PHP_EOL;
    }
}
