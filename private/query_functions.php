<?php
/* ---------------------------- Card Company ---------------------------- */
function find_company_by_card_id($id) {
  global $db;
  
  $sql = "SELECT * FROM card_company ";
  $sql .= "WHERE id IN ";
  $sql .= "(SELECT company_id FROM card ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "') ";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $company = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $company;
}

function find_all_companys() {
  global $db;

  $sql = "SELECT * FROM card_company ";
  $sql .= "ORDER BY id ASC";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

/* ---------------------------- Card ---------------------------- */
function find_all_cards() {
    global $db;

    $sql = "SELECT * FROM card ";
    $sql .= "ORDER BY id ASC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

// function oci_find_all_cards() {
//   global $db;
  
//   $sql = "SELECT * FROM card ";
//   $sql = "ORDER BY id ACS";

//   $result = OCIParse($db, $sql);
//   OCIExecute($result);
//   return $result;
// }

function insert_card($card) {
  global $db;

  $sql = "INSERT INTO card ";
  $sql .= "(name, type, benefit_id, company_id) ";
  $sql .= "VALUES (";
  // $sql .= "'" . db_escape($db, $card['id']) . "',";
  $sql .= "'" . db_escape($db, $card['name']) . "',";
  $sql .= "'" . db_escape($db, $card['type']) . "',";
  $sql .= "'" . db_escape($db, $card['benefit_id']) . "',";
  $sql .= "'" . db_escape($db, $card['company_id']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);

  // For INSERT statements, $result is true/false
  if($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_card($card) {
  global $db;

  $sql = "UPDATE card SET ";
  $sql .= "name='" . db_escape($db, $card['name']) . "', ";
  $sql .= "type='" . db_escape($db, $card['type']) . "', ";
  $sql .= "benefit_id='" . db_escape($db, $card['benefit_id']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $card['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_card($id) {
  global $db;

  $sql = "DELETE FROM card ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function find_card_by_id($id) {
  global $db;

  $sql = "SELECT * FROM card ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $card = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $card; // returns an assoc. array
}

function find_cards_by_franchise_id($id) {
  global $db;
  $sql = "SELECT * FROM card ";
  $sql .= "WHERE id IN ";
  $sql .= "(SELECT card_id FROM affiliate ";
  $sql .= "WHERE franchise_id='" . db_escape($db, $id) . "') ";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_cards_by_benefit_id($id) {
  global $db;
  $sql = "SELECT * FROM card ";
  $sql .= "WHERE benefit_id='" . db_escape($db, $id) . "' ";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

/* ---------------------------- Franchise ---------------------------- */
function find_all_franchise() {
  global $db;

  $sql = "SELECT * FROM franchise ";
  $sql .= "ORDER BY id ASC";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_franchise_by_id($id) {
    global $db;

    $sql = "SELECT * FROM franchise ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $franchise = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $franchise; // returns an assoc. array
} 

function insert_franchise($franchise) {
  global $db;

  $sql = "INSERT INTO franchise ";
  $sql .= "(name, type) ";
  $sql .= "VALUES (";
  // $sql .= "'" . db_escape($db, $franchise['id']) . "',";
  $sql .= "'" . db_escape($db, $franchise['name']) . "',";
  $sql .= "'" . db_escape($db, $franchise['type']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);

  // For INSERT statements, $result is true/false
  if($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_franchise($franchise) {
  global $db;

  $sql = "UPDATE franchise SET ";
  $sql .= "name='" . db_escape($db, $franchise['name']) . "', ";
  $sql .= "type='" . db_escape($db, $franchise['type']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $franchise['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_franchise($franchise) {
  global $db;

  $sql = "DELETE FROM franchise ";
  $sql .= "WHERE id='" . db_escape($db, $franchise) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function find_franchise_id_by_franchisee_id($id) {
  global $db;

  $sql = "SELECT franchise_id FROM franchisee ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $franchise = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $franchise; // returns an assoc. array
}

/* ---------------------------- Franchisee ---------------------------- */

function find_franchisee_by_franchise_id($id) {
    global $db;

    $sql = "SELECT * FROM franchisee ";
    $sql .= "WHERE franchise_id='" . db_escape($db, $id) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_franchisee_by_id($id) {
  global $db;

  $sql = "SELECT * FROM franchisee ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $franchisee = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $franchisee;
}

function insert_franchisee($franchisee) {
  global $db;

  $sql = "INSERT INTO franchisee ";
  $sql .= "(branch, address, phone_number, franchise_id) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $franchisee['branch']) . "',";
  $sql .= "'" . db_escape($db, $franchisee['address']) . "',";
  $sql .= "'" . db_escape($db, $franchisee['phone_number']) . "',";
  $sql .= "'" . db_escape($db, $franchisee['franchise_id']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);

  // For INSERT statements, $result is true/false
  if($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}   

function delete_franchisee($franchisee) {
  global $db;

  $sql = "DELETE FROM franchisee ";
  $sql .= "WHERE id='" . db_escape($db, $franchisee) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_franchisee($franchisee) {
  global $db;

  $sql = "UPDATE franchisee SET ";
  $sql .= "branch='" . db_escape($db, $franchisee['branch']) . "', ";
  $sql .= "address='" . db_escape($db, $franchisee['address']) . "', ";
  $sql .= "phone_number='" . db_escape($db, $franchisee['phone_number']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $franchisee['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

/* ---------------------------- Affiliate ---------------------------- */
function find_all_affiliate() {
  global $db;

  $sql = "SELECT * FROM affiliate ";
  $sql .= "ORDER BY franchise_id ASC";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function insert_affiliate($benefit) {
  global $db;

  $sql = "INSERT INTO affiliate ";
  $sql .= "(franchise_id, card_id) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $benefit['franchise_id']) . "',";
  $sql .= "'" . db_escape($db, $benefit['card_id']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);

  // For INSERT statements, $result is true/false
  if($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

/* ---------------------------- Benefits ---------------------------- */
function find_benefits_by_franchise_id($id) {
    global $db;
    
    $sql = "SELECT detail FROM benefits ";
    $sql .= "WHERE id IN ";
    $sql .= "(SELECT benefit_id FROM card ";
    $sql .= "WHERE id IN ";
    $sql .= "(SELECT card_id FROM affiliate ";
    $sql .= "WHERE franchise_id='" . db_escape($db, $id) . "')) ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_benefit_by_id($id) {
  global $db;
  
  $sql = "SELECT * FROM benefits ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $benefit = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $benefit;
}

function find_benefit_by_card_id($id) {
  global $db;
  
  $sql = "SELECT * FROM benefits ";
  $sql .= "WHERE id IN ";
  $sql .= "(SELECT benefit_id FROM card ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "') ";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $benefit = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $benefit;
}

function find_all_benefits() {
  global $db;

  $sql = "SELECT * FROM benefits ";
  $sql .= "ORDER BY id ASC";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function insert_benefit($benefit) {
  global $db;

  $sql = "INSERT INTO benefits ";
  $sql .= "(detail) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $benefit['detail']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);

  // For INSERT statements, $result is true/false
  if($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}   

function delete_benefit($id) {
  global $db;

  $sql = "DELETE FROM benefits ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_benefit($benefit) {
  global $db;

  $sql = "UPDATE benefits SET ";
  $sql .= "detail='" . db_escape($db, $benefit['detail']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $benefit['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}


// Admins

// Find all admins, ordered id
function find_all_admins() {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_admin_by_id($id) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
}

function find_admin_by_username($username) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
}

function validate_admin($admin, $options=[]) {

    $password_required = $options['password_required'] ?? true;

    if(is_blank($admin['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($admin['email'], array('max' => 255))) {
      $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    if(is_blank($admin['username'])) {
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($admin['username'], array('min' => 5, 'max' => 255))) {
      $errors[] = "Username must be between 5 and 255 characters.";
    } elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
      $errors[] = "Username not allowed. Try another.";
    }

    if($password_required) {
      if(is_blank($admin['password'])) {
        $errors[] = "Password cannot be blank.";
      } elseif (!has_length($admin['password'], array('min' => 4))) {
        $errors[] = "Password must contain 4 or more characters";
      } /*elseif (!preg_match('/[A-Z]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 symbol";
      } */

      if(is_blank($admin['confirm_password'])) {
        $errors[] = "Confirm password cannot be blank.";
      } elseif ($admin['password'] !== $admin['confirm_password']) {
        $errors[] = "Password and confirm password must match.";
      }
    }

    return $errors;
}

function insert_admin($admin) {
    global $db;

    $errors = validate_admin($admin);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['email']) . "',";
    $sql .= "'" . db_escape($db, $admin['username']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function update_admin($admin) {
    global $db;

    $password_sent = !is_blank($admin['password']);

    $errors = validate_admin($admin, ['password_required' => $password_sent]);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE admins SET ";
    $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
    if($password_sent) {
      $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "', ";
    }
    $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function delete_admin($admin) {
    global $db;

    $sql = "DELETE FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

?>
