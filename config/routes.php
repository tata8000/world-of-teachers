<?php

return array(
    'lk/mypublishings' => 'publishings/index',
    'lk/mypublishings/addpublication' => 'publishings/addpublication',
    'lk/mypublishings/deletepublication' => 'publishings/deletepublication',
    'lk/mypublishings/([0-9]+)' => 'publishings/view/$1',
    'lk/communities/addcommunity' => 'lk/addcommunity',
    'lk/communities/deletecommunity' => 'lk/deletecommunity',
    'lk/communities/page-([0-9]+)/([0-9]+)' => 'lk/community/$1/$2',
    'lk/communities/page-([0-9]+)' => 'lk/mycommunities/$1',
    'lk/myinterests' => 'lk/myinterests',
    'lk/myinterests/publishings_interest_id-([0-9]+)' => 'lk/publishings/$1',
    'lk/myinterests/publishings_interest_id-([0-9]+)/([0-9]+)' => 'lk/publishings_view/$1/$2',
    'lk/mypersonaldata' => 'lk/mypersonaldata',
    'lk' => 'lk/index',
    'user/register' => 'user/register',
    'user/reg_continue' => 'user/reg_continue',
    'user/agreement' => 'user/agreement',
    'user/authorization' => 'user/authorization',
    'user/exit' => 'user/exit',
    'about' => 'site/about',
    'support' => 'site/support',
    '' => 'site/index'
);


//'publishings' => 'publishings/index',
//    'publishings/([0-9]+)' => 'publishings/view/$1',