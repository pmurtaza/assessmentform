import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { applicantSchema } from '../validationSchemas';

export default function Step1ApplicantDetails({ initialValues, onNext }) {
  return (
    <Formik
      initialValues={{
        name: '',
        its: '',
        age: '',
        mauzeJamiat: '',
        contactNumber: '',
        email: '',
        fullResidentialAddress: '',
        presentOccupationAndWorkAddress: '',
        otherRelevantInfo: '',
        ...initialValues,
      }}
      validationSchema={applicantSchema}
      onSubmit={onNext}
    >
      {({ errors, touched }) => (
        <Form className="container mt-4">
          <div className="row">
            <div className="col-md-6 mb-3">
              <label htmlFor="name" className="form-label">Full Name</label>
              <Field
                name="name"
                placeholder="Enter your full name"
                className={`form-control ${errors.name && touched.name ? 'is-invalid' : ''}`}
              />
              <ErrorMessage name="name" component="div" className="text-danger" />
            </div>

            <div className="col-md-6 mb-3">
              <label htmlFor="its" className="form-label">ITS</label>
              <Field
                name="its"
                placeholder="Enter your ITS"
                className={`form-control ${errors.its && touched.its ? 'is-invalid' : ''}`}
              />
              <ErrorMessage name="its" component="div" className="text-danger" />
            </div>

            <div className="col-md-6 mb-3">
              <label htmlFor="age" className="form-label">Age</label>
              <Field
                name="age"
                type="number"
                placeholder="Enter your age"
                className={`form-control ${errors.age && touched.age ? 'is-invalid' : ''}`}
              />
              <ErrorMessage name="age" component="div" className="text-danger" />
            </div>

            <div className="col-md-6 mb-3">
              <label htmlFor="mauzeJamiat" className="form-label">Mauze & Jamiat</label>
              <Field
                name="mauzeJamiat"
                placeholder="Enter Mauze & Jamiat"
                className={`form-control ${errors.mauzeJamiat && touched.mauzeJamiat ? 'is-invalid' : ''}`}
              />
              <ErrorMessage name="mauzeJamiat" component="div" className="text-danger" />
            </div>

            <div className="col-md-6 mb-3">
              <label htmlFor="contactNumber" className="form-label">Contact Number</label>
              <Field
                name="contactNumber"
                placeholder="Enter your contact number"
                className={`form-control ${errors.contactNumber && touched.contactNumber ? 'is-invalid' : ''}`}
              />
              <ErrorMessage name="contactNumber" component="div" className="text-danger" />
            </div>

            <div className="col-md-6 mb-3">
              <label htmlFor="email" className="form-label">Email ID</label>
              <Field
                name="email"
                type="email"
                placeholder="Enter your email"
                className={`form-control ${errors.email && touched.email ? 'is-invalid' : ''}`}
              />
              <ErrorMessage name="email" component="div" className="text-danger" />
            </div>

            <div className="col-md-6 mb-3">
              <label htmlFor="fullResidentialAddress" className="form-label">Full Residential Address</label>
              <Field
                name="fullResidentialAddress"
                as="textarea"
                placeholder="Enter your full residential address"
                className={`form-control ${errors.fullResidentialAddress && touched.fullResidentialAddress ? 'is-invalid' : ''}`}
                rows="3"
              />
              <ErrorMessage name="fullResidentialAddress" component="div" className="text-danger" />
            </div>

            <div className="col-md-6 mb-3">
              <label htmlFor="presentOccupationAndWorkAddress" className="form-label">Present Occupation and Address</label>
              <Field
                name="presentOccupationAndWorkAddress"
                as="textarea"
                placeholder="Enter your occupation and place of work"
                className={`form-control ${errors.presentOccupationAndWorkAddress && touched.presentOccupationAndWorkAddress ? 'is-invalid' : ''}`}
                rows="3"
              />
              <ErrorMessage name="presentOccupationAndWorkAddress" component="div" className="text-danger" />
            </div>

            <div className="col-md-6 mb-3">
              <label htmlFor="otherRelevantInfo" className="form-label">Other Relevant Information</label>
              <Field
                name="otherRelevantInfo"
                as="textarea"
                placeholder="Enter any other relevant information"
                className={`form-control ${errors.otherRelevantInfo && touched.otherRelevantInfo ? 'is-invalid' : ''}`}
                rows="3"
              />
              <ErrorMessage name="otherRelevantInfo" component="div" className="text-danger" />
            </div>

          </div>

          <div className="d-flex justify-content-end mt-4">
            <button type="submit" className="btn btn-primary">Next Step</button>
          </div>
        </Form>
      )}
    </Formik>
  );
}
