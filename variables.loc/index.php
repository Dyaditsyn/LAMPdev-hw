<?php
$fname = "me";
$email = "me@php.ua";
$pwd = 12345;
$lengs = [
    "eng" => "English",
    "ru" => "Русский",
    "ua" => "Українська"
];

$users = [
    "5" => ["name" => "Test", "email" => "test@test.com", "lang" => "ru"],
    "3" => ["name" => "Anton", "email" => "anton@gmail.com",  "lang" => "ua"],
    "1" => ["name" => "Stewart", "email" => "stewart@gmail.com",  "lang" => "en"],
    "23" => ["name" => "Bernardo", "email" => "bernardo@gmail.com",  "lang" => "fr"],
    "11" => ["name" => "Maximillian", "email" => "maximilian@gmail.com",  "lang" => "de"],
    "17" => ["name" => "Tyler", "email" => "tyler@gmail.com",  "lang" => "en"],
    "8" => ["name" => "Sedrick", "email" => "sedrick@gmail.com",  "lang" => "ru"],
];

$sortedUsers = $users;
krsort($sortedUsers);

$greetings = [
    "ru" => "Привет", "ua" => "Привіт", "en" => "Hello", "fr" => "Bonjour", "de" =>  "Hallo"
];

reset($users);
reset($sortedUsers);

echo "In the original unsorted array both first and last users are ru speakers" . "<pre>";
print_r($greetings[current($users)["lang"]] . ", " . current($users)["name"]);
if (current($users)["lang"] !== end($users)["lang"]) {
    print_r($greetings[end($users)["lang"]] . ", " . end($users)["name"]);
}
echo "</pre>";

// same code different array
echo "In the sorted array the first user speaks fr and last one speaks en" . "<pre>";
print_r($greetings[current($sortedUsers)["lang"]] . ", " . current($sortedUsers)["name"]);
if (current($sortedUsers)["lang"] !== end($sortedUsers)["lang"]) {
    print_r("<br>" . $greetings[end($sortedUsers)["lang"]] . ", " . end($sortedUsers)["name"]);
}
echo "</pre>";

echo "Original data", "<pre>";
print_r($users);
echo "</pre>";

echo "Number of users in array", "<pre>";
var_dump(count($users));
echo "</pre>";

echo "Sorted array - descending order", "<pre>";
print_r($sortedUsers);
echo "</pre>";

//Max ID - the first one in a sorted array
echo "User with max ID", "<pre>";
print_r(current($sortedUsers));
echo "</pre>";
//Min ID - the last one in a sorted array
echo "User with min ID", "<pre>";
print_r(end($sortedUsers));
echo "</pre>";
//next after Min ID
echo "User with ID next afeter min", "<pre>";
print_r(prev($sortedUsers));
echo "</pre>";
//Previous before Max ID
reset($sortedUsers);
echo "User with ID one before max",  "<pre>";
print_r(next($sortedUsers));
echo "</pre>";
//Delete user with MinID (the last one in a sorted array)
echo "User with min ID deleted", "<pre>";
unset($sortedUsers[array_search(end($sortedUsers), $sortedUsers)]);
print_r($sortedUsers);
echo "</pre>";
//Check original array alive 
echo "Check riginal data", "<pre>";
print_r($users);
echo "</pre>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP variables homework</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_page">
        <h1>PHP variables homework </h1>
        <form>
            <ul class="wrapper">
                <li class="form-row">
                    <label for="fname">Enter your name:</label>
                    <input type="text" id="fname" name="fname" value=<?php echo $fname; ?>>
                </li>
                <li class="form-row">
                    <label for="email">Enter your email:</label>
                    <input type="email" id="email" name="email" value=<?php echo $email; ?>>
                </li>
                <li class="form-row">
                    <label for="pwd">Choose a Password:</label>
                    <input type="password" id="pwd" name="pwd" value=<?php echo $pwd; ?>>
                </li>
                <li class="form-row">
                    <label for="re-pwd">Re-type your Password:</label>
                    <input type="password" id="re-pwd" name="re-pwd" value=<?php echo $pwd; ?>>
                </li>
                <li class="form-row">
                    <label for="leng">Choose a Language:</label>
                    <select name="leng" id="leng">
                        <option value="<?php echo array_keys($lengs)[0]; ?>" selected><?php echo $lengs["eng"]; ?></option>
                        <option value="<?php echo array_keys($lengs)[1]; ?>"><?php echo $lengs["ru"]; ?></option>
                        <option value="<?php echo array_keys($lengs)[2]; ?>"><?php echo $lengs["ua"]; ?></option>
                    </select>
                </li>
                <li class="form-row">
                    <input type="submit" id="submit" value="Send Request">
                </li>
            </ul>
        </form>
    </div>
</body>

</html>