import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { attachmentSchema } from '../validationSchemas';

export default function Step6Attachments({ initialValues, onNext }) {
  return (
    <Formik
      initialValues={{
        attachments: [],
        ...initialValues,
      }}
      validationSchema={attachmentSchema}
      onSubmit={onNext}
    >
      {({ errors, touched }) => (
        <Form className="container mt-4">
          <div className="row">
            {/* File Upload */}
            <div className="col-md-12 mb-3">
              <label htmlFor="attachments" className="form-label">Upload Attachments</label>
              <Field
                name="attachments"
                type="file"
                className={`form-control ${errors.attachments && touched.attachments ? 'is-invalid' : ''}`}
                multiple
              />
              <ErrorMessage name="attachments" component="div" className="text-danger" />
            </div>
          </div>

          <div className="d-flex justify-content-end mt-4">
            <button type="submit" className="btn btn-primary">Submit</button>
          </div>
        </Form>
      )}
    </Formik>
  );
}
