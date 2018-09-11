<?php
route::get('/news', view::url_view('main'), 'amain');
route::get('/news/read/krosovki/{id}', 'only', 'aonly');
route::get('/',view::url_view('main'), 'ahome');
