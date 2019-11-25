<?php
    include "CLASSES/THREAD/thread.php";
    $thread_list = Thread::search_thread($_GET["search"]);
?>

<h1 class="my-4">Search results:</h1>
<?php
  foreach($thread_list as $thread){
    $thread->display_thread();
  }
?>
