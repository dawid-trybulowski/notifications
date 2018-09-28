<?php

namespace App\Http\Controllers;


use App\src\UseCase\AddNewSchema;
use App\src\Validator\NewSchemaValidator;
use Illuminate\Http\Request;

class SchemaController
{
    /**
     * @var AddNewSchema
     */
    private $addNewSchema;

    /**
     * SchemaController constructor.
     * @param AddNewSchema $addNewSchema
     */
    public function __construct(AddNewSchema $addNewSchema)
    {
        $this->addNewSchema = $addNewSchema;
    }

    public function addNewSchema(Request $request)
    {
        $request->validate(NewSchemaValidator::RULES);
        $response = $this->addNewSchema->execute($request);
    }
}