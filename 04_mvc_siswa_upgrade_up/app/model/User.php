<?php
class User extends BaseModel{
    public function getByUsername($username) {
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
        /*
        Nah return nya kayak gini :
            $user = [
            'id' => 123,
            'username' => 'dontol',
            'password' => '$2y$10$wS2Wb.tK0.2Y2Z6P.5Q5I.aK0.2Y2Z6P.5Q5I.aK0.2Y2Z6P.5Q5IuN3/wF.',
            ];
        */
    }

    public function create($username, $password) {
        $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        return $stmt->execute();
    }
}
?>