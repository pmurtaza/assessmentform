import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { businessSchema } from '../validationSchemas';

export default function Step3Business({ initialValues, onNext, onBack }) {
  return (
    <Formik
      initialValues={{ currentBusiness: '', competitors: '', ...initialValues }}
      validationSchema={businessSchema}
      onSubmit={values => onNext(values)}
    >
      {() => (
        <Form className="space-y-4">
          <div>
            <label className="block text-sm font-medium">Present Business Description</label>
            <Field as="textarea" name="currentBusiness" className="mt-1 block w-full border rounded p-2"/>
            <ErrorMessage name="currentBusiness" component="div" className="text-red-500 text-sm"/>
          </div>
          <div>
            <label className="block text-sm font-medium">Main Competitors</label>
            <Field name="competitors" className="mt-1 block w-full border rounded p-2"/>
            <ErrorMessage name="competitors" component="div" className="text-red-500 text-sm"/>
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