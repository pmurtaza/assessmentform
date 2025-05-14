import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { financeSchema } from '../validationSchemas';

export default function Step5Finance({ initialValues, onNext, onBack }) {
  return (
    <Formik
      initialValues={{ enayat: '', qardan: '', ...initialValues }}
      validationSchema={financeSchema}
      onSubmit={values => onNext(values)}
    >
      {() => (
        <Form className="space-y-4">
          <div>
            <label className="block text-sm font-medium">Enayat Amount</label>
            <Field name="enayat" type="number" className="mt-1 block w-full border rounded p-2"/>
            <ErrorMessage name="enayat" component="div" className="text-red-500 text-sm"/>
          </div>
          <div>
            <label className="block text-sm font-medium">Qardan Amount</label>
            <Field name="qardan" type="number" className="mt-1 block w-full border rounded p-2"/>
            <ErrorMessage name="qardan" component="div" className="text-red-500 text-sm"/>
          </div>
          <div className="flex justify-between">
            <button type="button" onClick={onBack} className="px-4 py-2 border rounded">Back</button>
            <button type="submit" className="bg-blue-600 text-white px-4 py-2 rounded">Next</button>
          </div>
        </Form>
      )}
    </Formik>
  );
}