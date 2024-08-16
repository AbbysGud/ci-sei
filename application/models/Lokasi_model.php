<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

    private $api_url = 'http://localhost:8080/';

    public function get_data($endpoint)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->api_url . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($http_code == 200) {
            $decoded_response = json_decode($response, true);

            if (isset($decoded_response['status']) && $decoded_response['status'] === 'success' && isset($decoded_response['data'])) {
                return $decoded_response['data'];
            } else {
                log_message('error', "API response was not successful. Response: $response");
                return false;
            }
        } else {
            log_message('error', "Failed to fetch data from API. HTTP Status Code: $http_code. Response: $response");
            return false;
        }
    }

    public function insert_data($data, $endpoint)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->api_url . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($http_code == 201 || $http_code == 200) {
            return json_decode($response, true);
        } else {
            log_message('error', "Failed to insert data to API. HTTP Status Code: $http_code. Response: $response");
            return false;
        }
    }

    public function update_data($data, $endpoint)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->api_url . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($http_code == 200) {
            return json_decode($response, true);
        } else {
            log_message('error', "Failed to update data in API. HTTP Status Code: $http_code. Response: $response");
            return false;
        }
    }

	public function delete_data($data, $endpoint)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api_url . $endpoint,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => 'DELETE',
			CURLOPT_POSTFIELDS => json_encode($data),
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
		));
	
		$response = curl_exec($curl);
		$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
	
		if ($http_code == 200 || $http_code == 204) {
			return true;
		} else {
			log_message('error', "Failed to delete data from API. HTTP Status Code: $http_code. Response: $response");
			return false;
		}
	}

}
