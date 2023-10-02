<?php

function invalidUid($username){
    $result="";
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createUser($conn, $username, $email, $password, $contactNumber, $address){
    $sql = "INSERT INTO users (userName, email, pwd, contactNumber, address) VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../register.php?error=stmtfaild");
        exit();
    }

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $password, $contactNumber, $address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none");
    exit();
}

function emptyInputsLogin($username, $password){
    $result="";
    if(empty($username)||empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function uidExcist($conn, $email){
    $sql = "SELECT * FROM users WHERE email = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../register.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function adminExcist($conn, $email){
    $sqlAdmin = "SELECT * FROM admins WHERE adminEmail = ?;";

    $stmtAdmin = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtAdmin, $sqlAdmin)){
        header("Location:../register.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmtAdmin, "s", $email);
    mysqli_stmt_execute($stmtAdmin);
    $resultData = mysqli_stmt_get_result($stmtAdmin);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmtAdmin);
}

function LoginUser($conn, $email, $password){
    
    $uidExcist = uidExcist($conn, $email);
    $adminNameExcist = adminExcist($conn, $email);

    if($uidExcist === false && $adminNameExcist === false){
        header("Location:../login.php?error=invlidemail");
        exit();
    }

    $passwordHashed = $uidExcist['pwd'];
    $passwordHashedAdmin = $adminNameExcist['adminPwd'];

    // $chkPassword = password_verify($password, $passwordHashed);
    if($passwordHashed !== $password && $passwordHashedAdmin !== $password){
        header("Location:../login.php?error=invalidpassword");
        exit();
    }else if($passwordHashed == $password){
        session_start();
        $_SESSION["userid"] = $uidExcist["userId"];
        $_SESSION["username"] = $uidExcist["userName"];
        $_SESSION["email"] = $uidExcist["email"];
        header("Location:../index.php");
        exit();
    }
    else if($passwordHashedAdmin == $password){
        session_start();
        $_SESSION["adminId"] = $adminNameExcist["adminId"];
        $_SESSION["adminName"] = $adminNameExcist["adminName"];
        $_SESSION["adminEmail"] = $adminNameExcist["adminEmail"];
        header("Location:../index.php");
        exit();
    }

}

// function Login($conn, $email, $password){
//     $uidExcist = uidExcist($conn, $email);
//     $adminNameExcist = adminExcist($conn, $email);

//     if($uidExcist !== false){
//         LoginUser($password, $uidExcist);
//     }
//     else if($adminNameExcist !== false){
//         LoginAdmin($password, $adminNameExcist);
//     }
//     else{
//         header("Location: ../login.php?error=invalidemail");
//         exit();
//     }
// }

// function LoginUser($password, $uidExcist){
//     $passwordHashed = $uidExcist['pwd'];

//     if($passwordHashed !== $password){
//         header("Location: ../login.php?error=invaliduserpassword");
//         exit();
//     }
//     else if($passwordHashed === $password){
//         session_start();
//         $_SESSION["userid"] = $uidExcist["userId"];
//         $_SESSION["username"] = $uidExcist["userName"];
//         $_SESSION["email"] = $uidExcist["email"];
//         header("Location:../index.php");
//         exit();
//     }
        
// }

// function LoginAdmin($password, $adminNameExcist){
//     $passwordHashedAdmin = $adminNameExcist['adminPwd'];

//     if($passwordHashedAdmin !== $password){
//         header("Location: ../login.php?error=invalidadminpassword");
//         exit();
//     }
//     else if($passwordHashedAdmin === $password){
//         session_start();
//         $_SESSION["adminId"] = $adminNameExcist["adminId"];
//         $_SESSION["adminName"] = $adminNameExcist["adminName"];
//         $_SESSION["adminEmail"] = $adminNameExcist["adminEmail"];
//         header("Location:../index.php");
//         exit();
//     }
// }