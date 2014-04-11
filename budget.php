<?php
echo '<p>Starting request 1</p>';
flush();
sleep(2);
echo '<p>Request 1 done. Starting request 2.</p>';
flush();
sleep(2);
echo '<p>Request 2 done.</p>';