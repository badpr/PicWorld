<?php
if(ACTIVE_APP == app::get()) {
    return array(
        'count' => 5804
    );
}else{
    return array(
        'count' => 'Только в приложений News'
    );
}