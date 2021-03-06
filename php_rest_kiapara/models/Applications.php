<?php

class Applications{
    private $conn;
    private $table = 'applications';
    public $id;
    public $client_id;
    public $title;
    public $description;
    public $status;
    public $imagepath;
    public $price;
    public $date;
    public $end_date;
    public $street;
    public $suburb;
    public $city;
    public $postcode;
    public $fname;
    public $lname;
    public $number;
    public $job__type_id;
    public $type;
    

    public function __construct($db){
        $this->conn = $db;
    }

    public function getApplications(){
        $query = 'SELECT 
            id,
            client_id,
            status,
            imagePath,
            title,
            description,
            price,
            date,
            end_date,
            street,
            suburb,
            city,
            postcode
        FROM
        ' . $this->table .'';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getClientApplications(){
        $query = 'SELECT 
            id,
            client_id,
            status,
            imagePath,
            title,
            description,
            price,
            date,
            end_date,
            street,
            suburb,
            city,
            postcode
        FROM
        ' . $this->table .'
        WHERE 
            client_id = ?';    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$this->client_id);
        $stmt->execute();
        return $stmt;    
    }
        public function getAvailableApplications(){
        $query = 'SELECT 
        a.id,
        a.client_id,
        a.status,
        a.imagePath,
        a.title,
        a.description,
        a.price,
        a.date,
        a.street,
        a.suburb,
        a.city,
        a.job__type_id,
        c.first_name as fname,
        c.last_name as lname,
        c.phone_number as number,
        j.description as type
    FROM
    ' . $this->table .' a
    JOIN 
        clients c ON a.client_id = c.id
    JOIN
        job__types j ON a.job__type_id = j.id
    WHERE 
        a.status = 1
    ORDER BY a.date';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
        public function getCurrentApplications(){
        $query ='SELECT
        p.status,
        p.imagePath,
        p.title,
        p.description,
        p.end_date,
        p.price,
        p.date,
        p.street,
        p.suburb,
        p.city,
        p.end_date,
        c.first_name as fname,
        c.last_name as lname,
        c.phone_number as number
    FROM
        ' . $this->table .' p
    JOIN 
        clients c ON p.client_id = c.id
    JOIN
        service__provider__jobs j ON p.id = j.job_id
    JOIN
        service_providers s ON j.service_provider_id = s.id
    WHERE
        s.id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$this->s_id);
        $stmt->execute();
        return $stmt;
    }
}
