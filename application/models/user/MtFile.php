<?php // Model: File_model.php
defined('BASEPATH') or exit('No direct script access allowed');

class MtFile extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    // Insert a new file record into the database
    public function insert_file($data)
    {
        return $this->db->insert('uploaded_files', $data); // Insert the data into the table
    }

    // Get all files associated with a specific ticket
    public function get_files_by_ticket($id_tiket)
    {
        $this->db->where('id_tiket', $id_tiket);
        $query = $this->db->get('uploaded_files'); // Get records by id_tiket
        return $query->result(); // Return the result as an array of objects
    }

    // Get a specific file by its ID
    public function get_file_by_id($file_id)
    {
        $this->db->where('id', $file_id);
        $query = $this->db->get('uploaded_files'); // Get record by ID
        return $query->row(); // Return a single object
    }

    // Update an existing file record
    public function update_file($file_id, $data)
    {
        $this->db->where('id', $file_id);
        return $this->db->update('uploaded_files', $data); // Update the record
    }

    // Delete a file record by its ID
    public function delete_file($file_id)
    {
        $this->db->where('id', $file_id);
        return $this->db->delete('uploaded_files'); // Delete the record
    }
}
?>