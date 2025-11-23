<?php
// 1. Создать календарь:
//    Подзадачи:
//   - Месяц и год
//   - Дни недели в строку
//  2. Входные данные:
//   Готовые решения date('Y')
//                   date('n')
//
// 3. Задачи:
//    - Получить $year
//    - Получить $month
//  - Поcчитать характеристики месяца
//  - Заголовок календаря
//  - Цикл по дням и месяцам
$year = date('Y');
$month = date('n');
$firstDayTimestamp = mktime(0, 0, 0, $month, 1, $year);
$daysInMonth = date('t', $firstDayTimestamp);
$startWeekday = date('N', $firstDayTimestamp);
$months = [
    1 => 'Январь', 2 => 'Февраль', 3 => 'Март',
    4 => 'Апрель', 5 => 'Май', 6 => 'Июнь',
    7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь',
    10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'
];
echo "   " . $months[$month] . " " . $year . "\n";
echo "Пн Вт Ср Чт Пт Сб Вс" . "\n";
for ($i = 1; $i < $startWeekday; $i++) {
    echo "   ";
}
$day = 1;
$weekday = $startWeekday;
while ($day <= $daysInMonth) {
    printf("%2d ", $day);
    if ($weekday == 7) {
        echo "\n";
        $weekday = 1;
    } else {
        $weekday++;
    }
    $day++;
}
echo "\n";
