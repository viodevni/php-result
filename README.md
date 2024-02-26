# Php Result
A simple php object for passing the result of an action back to the caller with optional data array and parseable string, if required.

### Success

#### Helper function
```
$result = success('action_success', [
    'message' => 'Success!'
]);
```
#### Static method
```
$result = Result::success('action_success', [
    'message' => 'Success!'
]);
```

#### Result
```
Viodev\Result {
  +result: "success"
  +code: "action_success"
  +data: array:1 [
    "message" => "Success!"
  ]
}

$result->success EQUALS true
$result->false EQUALS false
```

### Fail

#### Helper function
```
$result = fail('action_fail', [
    'error' => 'An error occurred!'
]);
```
#### Static method
```
$result = Result::fail('action_fail', [
    'error' => 'An error occurred!'
]);
```

#### Result
```
Viodev\Result {
  +result: "fail"
  +code: "action_fail"
  +data: array:1 [
    "message" => "An error occurred!"
  ]
}

$result->fail EQUALS true
$result->success EQUALS false
```
