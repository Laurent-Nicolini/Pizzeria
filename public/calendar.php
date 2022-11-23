<?php
?>

<p class="reservation bg-success text-white">RESERVATION</p>

<?php 
use Vtiful\Kernel\Format;
require 'src/date/month.php';
try{
    $month = new App\date\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
    $start = $month->getStartingDay();
    $start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('Last Monday');
} catch (\Exception $e){
    $month = new \App\date\Month();
} ?>

<div class="d-flex flex-row align-items-center justify-content-between mx-3">
    <h3><?= $month->toString(); ?></h3>
    <div>
        <a href="contact.php?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>" class="btn btn-success"><</a>
        <a href="contact.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn btn-success">></a>
    </div>

</div>


<table class="calendar__table calendar__table--<?= $month->getWeeks();?>weeks">
    <?php for ($i = 0; $i < $month->getWeeks(); $i++): ?>

        <tr>
            <?php
            foreach ($month->days as $k => $day):
                $date = (clone $start)->modify("+" . ($k + $i * 7) . " days");
            ?>
            <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?>">
                <a href="reservation.php">
                    <?php if ($i === 0): ?>
                        <div class="calendar__weekday"><?= $day; ?></div>
                    <?php endif; ?>
                        <div class="calendar__day text-center mt-2"><?= $date->format('d'); ?></div>
                </a>
            </td>            
            <?php endforeach; ?>
        </tr>

    <?php endfor; ?>
</table>
