<?php

namespace App\Http\Components\API;

trait BaseApiTrait
{
    /**
     * @param string $msg
     * @param int $statusCode
     * @param mixed|null $result
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleResponse(string $msg, int $statusCode = 200, mixed $result = null)
    {
        return response()->json(
            [
                'suceess' => $this->statusToBool($statusCode),
                'message' => $msg,
                'data' => $result,
            ],
            $statusCode
        );
    }

    /**
     * @param int $statusCode
     * @return bool
     */
    protected function statusToBool(int $statusCode): bool
    {
        $codes = [200, 201];

        if (!in_array($statusCode, $codes)) {
            return false;
        }

        return true;
    }

    public function handleError($errors = null)
    {
        if ($errors === null) {
            return response()->json([], 404);
        }

        $res = [
            'success' => false,
            'message' => "$errors->getMessage() On File: $errors->getFile(), On line: $errors->getLine()",
            'data' => null
        ];

        $error_status_code = $errors->getCode();

        if (
            $error_status_code == 0
            || !is_numeric($error_status_code)
            || $error_status_code > 500
        ) {
            return response()->json($res, 500);
        } else {
            return response()->json($res, $error_status_code);
        }
    }

    public function apiDataRequired(array $items = [])
    {
        $item_names = [];

        foreach ($items as $key => $item) {
            $item_names[$key] = $this->add_comma_no_underscore($item);
        }

        return $this->apiDatumRequired($item_names);
    }

    /**
     * @param string $item_name
     * @return string
     */
    public function apiDatumRequired(string $item_name): string
    {
        return $this->apiActionMessage($item_name, ' required');
    }

    /**
     * @param string $item_name
     * @param string $action
     * @return string
     */
    public function apiActionMessage(string $item_name, string $action): string
    {
        return $item_name . ' data is ' . $action;
    }

    /**
     * @param string|null $message
     * @return string
     */
    public function apiDataNotAuthorized(string $message = null): string
    {
        return 'Sorry, you are not authorized' . $message;
    }

    /**
     * @param string $item_name
     * @return string
     */
    public function apiDataListed(string $item_name): string
    {
        return $this->apiActionMessage($item_name, ' listed');
    }

    /**
     * @param string $item_name
     * @return string
     */
    public function apiDataShown(string $item_name): string
    {
        return $this->apiActionMessage($item_name, ' shown');
    }

    public function apiDataNotInserted($item_name)
    {
        $this->apiDataInserted($item_name, "not");
    }

    public function apiDataInserted($item_name, $reverse = "")
    {
        return $this->apiActionMessage($item_name, $reverse . ' inserted');
    }

    public function apiDataNotUpdated($item_name)
    {
        $this->apiDataUpdated($item_name, "not");
    }

    public function apiDataUpdated($item_name, $reverse = "")
    {
        return $this->apiActionMessage($item_name, $reverse . ' updated');
    }

    public function apiDataNotDeleted($item_name)
    {
        $this->apiDataDeleted($item_name, "not");
    }

    public function apiDataDeleted($item_name, $reverse = "")
    {
        return $this->apiActionMessage($item_name, $reverse . ' deleted');
    }

    public function apiNoDataError($item_name)
    {
        return $item_name . ' data not found!';
    }
}
