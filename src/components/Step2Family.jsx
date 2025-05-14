import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { familySchema } from '../validationSchemas';

export default function Step2Family({ initialValues, onNext, onBack }) {
  return (
    <Formik
      initialValues={{ familyMembers: [''], income: '', expenses: '', ...initialValues }}
      validationSchema={familySchema}
      onSubmit={values => onNext(values)}
    >
      {() => (
        <Form className="space-y-4">
          <div>
            <label className="block text-sm font-medium">Family Members (Comma separated)</label>
            <Field name="familyMembers" className="mt-1 block w-full border rounded p-2"/>
            <ErrorMessage name="familyMembers" component="div" className="text-red-500 text-sm"/>
          </div>
          <div>
            <label className="block text-sm font-medium">Total Income (Monthly)</label>
            <Field name="income" className="mt-1 block w-full border rounded p-2"/>
            <ErrorMessage name="income" component="div" className="text-red-500 text-sm"/>
          </div>
          <div>
            <label className="block text-sm font-medium">Total Expenses (Monthly)</label>
            <Field name="expenses" className="mt-1 block w-full border rounded p-2"/>
            <ErrorMessage name="expenses" component="div" className="text-red-500 text-sm"/>
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