<?php

  function security($data, $charset = 'UTF-8'){
      return htmlspecialchars($data, ENT_QUOTES, $charset);
  }