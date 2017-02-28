<TABLE>

<?php if(!empty($jugadores)): foreach($jugadores as $player): ?>
    <TR><TD><?php echo $player['idJugador']; ?></TD><TD><?php echo $player['nombreJugador']; ?></TD><TD><?php echo $player['categoria']; ?></TD><TD><?php echo $player['posicion']; ?></TD></TR>
<?php endforeach; endif; ?>

</TABLE>