import React from 'react';
import { Formik, Form, Field } from 'formik';
import { declarationSchema } from '../validationSchemas';

export default function Step6Declaration({ initialValues, onNext, onBack }) {
  return (
    <Formik
      initialValues={{ signature: '', ...initialValues }}
      validationSchema={declarationSchema}
      onSubmit={values => onNext(values)}
    >
      {() => (
        <Form className="space-y-4">
          <div>
            <label className="block text-sm font-medium">Digital Signature</label>
            <Field name="signature" className="mt-1 block w-full border rounded p-2" placeholder="Type your name"/>
          </div>
          <div className="flex justify-between">
            <button type="button" onClick={onBack} className="px-4 py-2 border rounded">Back</button>
            <button type="submit" className="bg-green-600 text-white px-4 py-2 rounded">Submit</button>
          </div>
        </Form>
      )}
    </Formik>
  );
}