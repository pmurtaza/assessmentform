import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { planSchema } from '../validationSchemas';

export default function Step4Plan({ initialValues, onNext, onBack }) {
  return (
    <Formik
      initialValues={{ actionPlan: '', timeline: '', ...initialValues }}
      validationSchema={planSchema}
      onSubmit={values => onNext(values)}
    >
      {() => (
        <Form className="space-y-4">
          <div>
            <label className="block text-sm font-medium">Economic Upliftment Action Plan</label>
            <Field as="textarea" name="actionPlan" className="mt-1 block w-full border rounded p-2"/>
            <ErrorMessage name="actionPlan" component="div" className="text-red-500 text-sm"/>
          </div>
          <div>
            <label className="block text-sm font-medium">Timeline (Years 1–5)</label>
            <Field name="timeline" className="mt-1 block w-full border rounded p-2"/>
            <ErrorMessage name="timeline" component="div" className="text-red-500 text-sm"/>
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