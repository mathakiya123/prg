<?php
class Survey {

    private $questionFile = "data/questions.csv";
    private $responseFile = "data/responses.csv";

    // Upload & save questions
    public function saveQuestions($tmpFile) {
        move_uploaded_file($tmpFile, $this->questionFile);
    }

    // Read questions
    public function getQuestions() {
        return array_map('str_getcsv', file($this->questionFile));
    }

    // Save user response
    public function saveResponse($answer) {
        $fp = fopen($this->responseFile, "a");
        fputcsv($fp, [$answer]);
        fclose($fp);
    }

    // Count responses
    public function getResults() {
        if (!file_exists($this->responseFile)) {
            return [];
        }
        $data = file($this->responseFile, FILE_IGNORE_NEW_LINES);
        return array_count_values($data);
    }
}
?>